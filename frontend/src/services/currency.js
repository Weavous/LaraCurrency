import { http } from './http.js';

export default {
    combinations: (token) => { return http.post(`/currencies/combinations`, { 'token': token }) }
};