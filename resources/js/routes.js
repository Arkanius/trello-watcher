import Home from './components/Home';
import Boards from './components/Boards';

export default {
    mode: 'history',

    routes: [
        {
            path: '/',
            component: Home
        },
        {
            path: '/boards',
            component: Boards,
            name: 'boards'
        }
    ]
};