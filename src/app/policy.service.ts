import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';

import { Observable, throwError } from 'rxjs';
import { map, catchError } from 'rxjs/operators';

import {Policy } from './policy';

@Injectable({
  providedIn: 'root'
})
export class PolicyService {

  baseUrl = 'http://localhost/acme/api';
  policies: Policy[]

  constructor(private http: HttpClient) { }

  getAll(): Observable<Policy[]> {
    return this.http.get(`${this.baseUrl}/read`).pipe(
      map((res) => {
        this.policies = res['body'];
        return this.policies;
      }),
      catchError(this.handleError));
  }

  store(policy: Policy): Observable<Policy[]> {
    return this.http.post(`${this.baseUrl}/create`, { data: policy})
      .pipe(map((res) => {
        this.policies.push(res['data']);
        return this.policies;
        }),
        catchError(this.handleError));
  }

  private handleError(error: HttpErrorResponse) {
    console.log(error);

    // flash a user friendly message
    return throwError('Error! something went wrong.');
  }

}
