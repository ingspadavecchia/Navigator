import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {InvoiceRoutingModule} from './invoice-routing.module';
import {IndexComponent} from './index/index.component';
import {ReactiveFormsModule} from "@angular/forms";

@NgModule({
  declarations: [
    IndexComponent
  ],
  imports: [
    CommonModule,
    InvoiceRoutingModule,
    ReactiveFormsModule
  ]
})
export class InvoiceModule {
}
