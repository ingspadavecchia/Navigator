import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs';
import {Invoice} from './invoice';

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

}
