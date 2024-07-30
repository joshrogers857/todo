import { ToDoItem } from "./to-do-item";

export interface ToDoList {
    id: number,
    user_id: number,
    title: string,
}

export interface ToDoListWithItems extends ToDoList {
    items: ToDoItem[],
}
