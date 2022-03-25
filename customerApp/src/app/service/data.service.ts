import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Employee } from '../employee';

@Injectable({
  providedIn: 'root',
})
export class DataService {
  constructor(private httpClient: HttpClient) {}
  getData() {
    return this.httpClient.get('http://localhost:8000/employees');
  }
  insertData(data: any) {
    return this.httpClient.post('http://localhost:8000/addEmployee', data);
  }
  deleteData(id: any) {
    return this.httpClient.delete('http://localhost:8000/deleteEmployee/' + id);
  }
  getEmployeeById(id: any) {
    return this.httpClient.get('http://localhost:8000/employees/' + id);
  }
  updateEmployee(id: any, data: Employee) {
    return this.httpClient.put(
      'http://localhost:8000/updateEmployee/' + id,
      data
    );
  }
}
