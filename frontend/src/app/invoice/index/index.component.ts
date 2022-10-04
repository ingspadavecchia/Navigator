import {Component, OnInit} from '@angular/core';
import {Invoice} from "../invoice";
import {InvoiceService} from "../invoice.service";
import {Client} from "../../client/client";
import {ClientService} from "../../client/client.service";
import {FormBuilder, FormControl, FormGroup} from "@angular/forms";

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})

export class IndexComponent implements OnInit {

  invoices: Invoice[] = [];
  clients: Client[] = [];
  clientsSelectorFormGroup: FormGroup = new FormGroup({
    clientSelectedFormControl: new FormControl('')
  });

  constructor(
    public invoiceService: InvoiceService,
    public clientService: ClientService,
    private formBuilder: FormBuilder) {
    this.createForm();
  }

  private createForm() {
    this.clientsSelectorFormGroup = this.formBuilder.group({
      clientSelectedFormControl: [''],
    });
  }

  ngOnInit(): void {
    this.getAllInvoices();
    this.getAllClients();
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

  private getInvoicesByClients(clients: Client[]) {
    this.invoiceService.getInvoicesByClients(clients).subscribe((data: Invoice[]) => {
      this.invoices = data;
    })
  }

  submit() {
    this.getInvoicesByClients(this.clientsSelectorFormGroup.value.clientSelectedFormControl);
  }

}
