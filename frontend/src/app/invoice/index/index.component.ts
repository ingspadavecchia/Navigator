import { Component, OnInit } from '@angular/core';
import {Invoice} from "../invoice";
import {InvoiceService} from "../invoice.service";

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})
export class IndexComponent implements OnInit {

  invoices: Invoice[] = [];

  constructor(public invoiceService: InvoiceService) { }

  ngOnInit(): void {

    this.invoiceService.getAll().subscribe((data: Invoice[])=>{
      this.invoices = data;
      console.log(this.invoices);
    })

  }

}
