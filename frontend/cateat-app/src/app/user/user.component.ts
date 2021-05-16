import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { HttpClient } from '@angular/common/http';

import { AuthService } from '../auth.service';

@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit {

  token = this.AuthService.token;
  id = this.AuthService.id;

  checkoutForm = this.formBuilder.group({
    account: '',
    password: ''
  });

  constructor(
    private AuthService: AuthService,
    private formBuilder: FormBuilder,
  ) { }

  ngOnInit(): void {
  }

  onSubmit(): void {
    this.AuthService
      .login(this.checkoutForm.value)
      .subscribe(data => {data.token=this.token;data.id=this.id;});
    // Process checkout data here
    console.warn('Your data has been submitted');
    this.checkoutForm.reset();
  }
}