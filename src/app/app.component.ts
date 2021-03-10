import { Component, OnInit } from '@angular/core';

import { Policy } from './policy';
import { PolicyService } from './policy.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  title = 'acme';
  policies: Policy[];
  policy = new Policy('', '', 0, '', '');
  error = '';
  success = '';


  constructor(private policyService: PolicyService) {

  }

  ngOnInit() {
    this.getPolicies();
  }

  getPolicies(): void {
    this.policyService.getAll().subscribe(
      (res: Policy[]) => {
        this.policies = res;
      },
      (err) => {
        this.error = err;
      }
    );
  }

  addPolicy(f) {
    this.error = '';
    this.success = '';

    this.policyService.store(this.policy)
      .subscribe(
        (res: Policy[]) => {
          //update policy list
          this.policies = res;
          //inform user
          this.success = 'Created Policy!';
          //reset the form
          f.reset();
        },
        (err) => this.error = err
      );
  }
}
