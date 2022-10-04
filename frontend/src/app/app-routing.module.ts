import {NgModule} from '@angular/core';
import {RouterModule, Routes} from '@angular/router';
import {IndexComponent} from "./invoice/index/index.component";

const routes: Routes = [
  {path: '', redirectTo: 'invoice/index', pathMatch: 'full'},
  {path: 'invoice/index', component: IndexComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {
}
