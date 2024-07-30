import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ToDoList } from './model/to-do-list';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ToDoService {
  private readonly url = 'http://localhost:8000/api/todos';

  constructor(private http: HttpClient) { }

  getToDoLists(): Observable<ToDoList[]> {
    return this.http.get<ToDoList[]>(this.url);
  }
}
