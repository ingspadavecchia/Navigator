import {NgModule} from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
import {AppRoutingModule} from './app-routing.module';
import {AppComponent} from './app.component';
import {NgbModule} from '@ng-bootstrap/ng-bootstrap';
import {HttpClientModule} from "@angular/common/http";
import {InvoiceModule} from "./invoice/invoice.module";
import {InvoiceDetailModule} from "./invoice/invoice-detail/invoice-detail.module";

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    InvoiceModule,
    InvoiceDetailModule,
    BrowserModule,
    AppRoutingModule,
    NgbModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule {
}
