import {Component, OnInit} from '@angular/core';
import {Invoice} from "../invoice";
import {InvoiceService} from "../invoice.service";
import {Client} from "../../client/client";
import {ClientService} from "../../client/client.service";
import {FormControl, FormGroup} from "@angular/forms";

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})

export class IndexComponent implements OnInit {

  invoices: Invoice[] = [];
  clients: Client[] = [];
  filterInvoicesByClientsForm: FormGroup = new FormGroup({
    clientsControl: new FormControl(null)
  });
  clientsControl: any;

  constructor(
    public invoiceService: InvoiceService,
    public clientService: ClientService) {
  }

  ngOnInit(): void {
    this.getAllInvoices();
    this.getAllClients();
    this.initializeClientSelector();
  }

  private initializeClientSelector() {
    this.filterInvoicesByClientsForm.setValue(
      this.clients
    );
  }

  private getAllClients() {
    this.clientService.getAll().subscribe((data: Client[]) => {
      this.clients = data;
    })
  }

  private getAllInvoices() {
    this.invoiceService.getAll().subscribe((data: Invoice[]) => {
      this.invoices = data;
    })
  }

  submit() {
    console.log("Form Submitted");
    console.log(this.filterInvoicesByClientsForm.value);
  }

}
