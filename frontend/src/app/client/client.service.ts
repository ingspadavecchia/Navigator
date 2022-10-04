import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Client} from "./client";
import {Observable} from "rxjs";

@Injectable({
  providedIn: 'root'
})

export class ClientService {

  private apiURL: string = 'http://localhost:8000';

  constructor(private httpClient: HttpClient) {
  }

  getAll(): Observable<Client[]> {
    return this.httpClient.get<Client[]>(this.apiURL + '/api/clients');
  }
}
