import { http } from './http.js';

export default {
    exchanges: (token, data) => { return http.post(`/exchanges`, { 'token': token, ...data }) }
};