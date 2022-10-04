import {Component, OnInit} from '@angular/core';
import {InvoiceDetail} from "../invoice-detail";
import {InvoiceDetailService} from "../invoice-detail.service";
import {ActivatedRoute} from '@angular/router';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})
export class IndexComponent implements OnInit {

  invoiceDetails: InvoiceDetail[] = [];

  constructor(public invoiceDetailService: InvoiceDetailService, private route: ActivatedRoute) {
  }

  ngOnInit(): void {
    let invoiceId = (<number><unknown>this.route.snapshot.paramMap.get('id'));
    this.getAllInvoiceDetailsByInvoiceId(invoiceId);
  }

  private getAllInvoiceDetailsByInvoiceId(invoiceId: number) {
    this.invoiceDetailService.getAllInvoiceDetailsByInvoiceId(invoiceId).subscribe((data: InvoiceDetail[]) => {
      this.invoiceDetails = data;
    })
  }

}
