import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs';
import {InvoiceDetail} from "./invoice-detail";

@Injectable({
  providedIn: 'root'
})

export class InvoiceDetailService {

  private apiURL: string = 'http://localhost:8000';

  constructor(private httpClient: HttpClient) {
  }

  getAllInvoiceDetailsByInvoiceId(invoiceId: number): Observable<InvoiceDetail[]> {
    return this.httpClient.get<InvoiceDetail[]>(this.apiURL + '/api/invoices/' + invoiceId + '/invoice_details');
  }

}
