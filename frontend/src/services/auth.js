import { http } from './http.js';

export default {
    login: (user) => { return http.post(`/auth/login`, user) }
};