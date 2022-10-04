import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {InvoiceDetailRoutingModule} from './invoice-detail-routing.module';
import {IndexComponent} from "./index/index.component";

@NgModule({
  declarations: [
    IndexComponent
  ],
  imports: [
    CommonModule,
    InvoiceDetailRoutingModule
  ]
})

export class InvoiceDetailModule {
}
