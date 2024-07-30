import { Routes } from '@angular/router';
import { ToDoListsComponent } from './components/to-do-lists/to-do-lists.component';

export const routes: Routes = [
    {
        path: 'lists',
        component: ToDoListsComponent,
        title: 'lists',
    },
    {
        path: '',
        redirectTo: 'lists',
        pathMatch: 'full',
    }
];
