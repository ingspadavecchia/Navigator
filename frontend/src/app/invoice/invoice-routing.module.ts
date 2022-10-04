import {NgModule} from '@angular/core';
import {RouterModule, Routes} from '@angular/router';
import {IndexComponent} from './index/index.component';
import {IndexComponent as InvoiceDetailIndexComponent} from './invoice-detail/index/index.component';

const routes: Routes = [
  {path: 'invoice', redirectTo: 'invoice/index', pathMatch: 'full'},
  {path: 'invoice/index', component: IndexComponent},
  {path: 'invoice/:id/invoice_detail', component: InvoiceDetailIndexComponent},
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class InvoiceRoutingModule {
}
