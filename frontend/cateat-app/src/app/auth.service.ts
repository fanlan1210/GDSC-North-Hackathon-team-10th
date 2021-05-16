import { Injectable } from '@angular/core';
import { HttpClient } from "@angular/common/http";
import { Observable, of } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  token = "";
  id = -1;

  constructor(
      private http: HttpClient
    ) {
   }

  login(body: FormData){
    return this.http.post<User>("/user/login",body);
  }

  register(body: FormData){
    return this.http.post("/user/register",body);
  }

  getUser(token: String){
    return this.http.get("/get/${this.id}",{headers:{Authorization:this.token}})
  }

  deleteUser(token: String){
    return this.http.delete("/delete",{headers:{Authorization:this.token}});
  }
}

interface User {
  id: number;
  token: string;
}