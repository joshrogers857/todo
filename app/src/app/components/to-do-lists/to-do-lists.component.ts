import { Component, OnInit } from '@angular/core';
import { ToDoList } from '../../services/model/to-do-list';
import { ToDoService } from '../../services/to-do-service.service';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-to-do-lists',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './to-do-lists.component.html',
  styleUrl: './to-do-lists.component.css'
})
export class ToDoListsComponent implements OnInit {
  toDoLists: ToDoList[] = [];

  constructor (
    private toDoService: ToDoService,
  ) {}

  ngOnInit(): void {
    this.toDoService.getToDoLists().subscribe({
      next: (data: ToDoList[]) => {
        this.toDoLists = data;
      },
      error: (error: any) => {
        console.error(error);
      }
    });
  }
}
