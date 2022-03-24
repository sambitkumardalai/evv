import { Component, OnInit } from '@angular/core';
import { DataService } from 'src/app/service/data.service';

@Component({
  selector: 'app-employees',
  templateUrl: './employees.component.html',
  styleUrls: ['./employees.component.css'],
})
export class EmployeesComponent implements OnInit {
  employees: any;
  constructor(private dataService: DataService) {}

  ngOnInit(): void {
    this.getEmployeesData();
  }
  getEmployeesData() {
    this.dataService.getData().subscribe((res) => {
      this.employees = res;
      this.employees = this.employees.employees;
    });
  }
}
