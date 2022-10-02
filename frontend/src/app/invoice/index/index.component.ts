import { Component, OnInit } from '@angular/core';
import {Invoice} from "../invoice";
import {InvoiceService} from "../invoice.service";
import {Client} from "../../client/client";
import {ClientService} from "../../client/client.service";

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})
export class IndexComponent implements OnInit {

  invoices: Invoice[] = [];
  clients: Client[] = [];

  constructor(public invoiceService: InvoiceService, public clientService: ClientService) { }

  ngOnInit(): void {

    this.invoiceService.getAll().subscribe((data: Invoice[])=>{
      this.invoices = data;
    })

    this.clientService.getAll().subscribe((data: Client[])=>{
      this.clients = data;
    })

  }

}
