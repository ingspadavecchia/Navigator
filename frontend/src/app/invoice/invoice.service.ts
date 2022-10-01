import { Injectable } from '@angular/core';

import { HttpClient, HttpHeaders } from '@angular/common/http';

import {  Observable, throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';

import { Invoice } from './invoice';
import {error} from "@angular/compiler-cli/src/transformers/util";

@Injectable({
  providedIn: 'root'
})

export class InvoiceService {

  private apiURL: string ='http://localhost:8000';

  constructor(private httpClient: HttpClient) { }


  getAll(): Observable<Invoice[]> {
    return this.httpClient.get<Invoice[]>(this.apiURL+'/api/invoices');
  }


  // errorHandler(error) {
  //   let errorMessage = '';
  //   if(error.error instanceof ErrorEvent) {
  //     errorMessage = error.error.message;
  //   } else {
  //     errorMessage = `Error Code: ${error.status}\nMessage: ${error.message}`;
  //   }
  //   return throwError(errorMessage);
  // }

}
