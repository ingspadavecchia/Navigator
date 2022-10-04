import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs';
import {Invoice} from './invoice';
import {Client} from "../client/client";

@Injectable({
  providedIn: 'root'
})

export class InvoiceService {

  private apiURL: string = 'http://localhost:8000';

  constructor(private httpClient: HttpClient) {
  }

  getAll(): Observable<Invoice[]> {
    return this.httpClient.get<Invoice[]>(this.apiURL + '/api/invoices');
  }

  getInvoicesByClients(clients: Client[]): Observable<Invoice[]> {

    let queryParams = '?';
    clients.forEach((client, index) => {
      if (index !== 0) {
        queryParams += '&';
      }
      queryParams += 'client_ids[]=' + client.id;
    });

    return this.httpClient.get<Invoice[]>(this.apiURL + '/api/invoices' + queryParams);
  }

}
