<template>
  <Main>
    <div>
      <div class="m-3" v-if="auth.isAuth === false">
        <div class="row">
          <div class="col-md-5">
            <input type="text" class="form-control" v-model="auth.user.email" placeholder="name@email.com" aria-label="name@email.com">
          </div>
          <div class="col-md-5">
            <input type="password" class="form-control" v-model="auth.user.password" placeholder="secret" aria-label="secret">
          </div>
          <div class="col-md-2">
            <button type="submit" v-on:click="getJWTAuthToken()" class="btn btn-outline-secondary w-100">Submit</button>
          </div>
        </div>
      </div>

      <div v-if="auth.isAuth === true">
        <div class="m-3">
          <div class="row">
            <div class="col-md-3">
              <label for="begin" class="form-label">Begin</label>
              <input type="date" v-on:change="LoadListing()" v-model="filters.begin" class="form-control" required>
            </div>
            <div class="col-md-3">
              <label for="end" class="form-label">End</label>
              <input type="date" v-on:change="LoadListing()" v-model="filters.end" class="form-control" required>
            </div>
            <div class="col-md-3">
              <label for="quantity" class="form-label">Quantity</label>
              <input type="text" v-on:change="LoadListing()" v-model="filters.quantity" class="form-control" required>
            </div>
            <div class="col-md-3">
              <label for="name" class="form-label">Currency</label>
              <select v-on:change="LoadListing()" v-model="filters.name" class="form-select" required>
                <option v-for="currency in this.currency.list" :key="currency.key" :value="currency.value">{{ currency.name }}</option>
              </select>
            </div>
          </div>
        </div>

        <div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">code</th>
                <th scope="col">codein</th>
                <th scope="col">name</th>
                <th scope="col">high</th>
                <th scope="col">low</th>
                <th scope="col">varBid</th>
                <th scope="col">pctChange</th>
                <th scope="col">bid</th>
                <th scope="col">ask</th>
                <th scope="col">timestamp</th>
                <th scope="col">create_date</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="el in table" :key="el.key">
                <th>{{ el.code }}</th>
                <td>{{ el.codein }}</td>
                <td>{{ el.name }}</td>
                <td>{{ el.high }}</td>
                <td>{{ el.low }}</td>
                <td>{{ el.varBid }}</td>
                <td>{{ el.pctChange }}</td>
                <td>{{ el.bid }}</td>
                <td>{{ el.ask }}</td>
                <td>{{ el.timestamp }}</td>
                <td>{{ el.create_date }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </Main>
</template>

<script>
import Main from "../layouts/Main/Main.vue";

import auth from "../services/auth.js";
import currency from "../services/currency.js";
import exchange from "../services/exchange.js";

export default {
  name: "Currency",
  data() {
    return {
      currency: {
        list: [],
      },
      auth: {
        jwt: "",
        isAuth: false,
        user: {
          email: null,
          password: null,
        },
      },
      filters: {
        begin: "",
        end: "",
        quantity: "",
        name: "",
      },
      table: []
    };
  },
  methods: {
    getJWTAuthToken() {
      const response = auth.login(this.auth.user);

      response
        .then((data) => {
          if (data.status === 200) {
            if (data.data.success === true) {
              this.auth.jwt = data.data.token;
              this.auth.isAuth = true;

              this.getAllCurrency();
            } else {
              console.error(data.data.error);
            }
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getAllCurrency() {
      const response = currency.combinations(this.auth.jwt);

      response.then(data => {
        if(data.status === 200) {
          Object.entries(data.data.data).forEach(entry => {
            this.currency.list.push({
              value: entry[0],
              name: entry[1]
            });
          });
        }
      }).catch(err => {
        console.error(err);
      })
    },
    LoadListing() {
      const filters = {
        begin: new Date(this.filters.begin).getTime(),
        end: new Date(this.filters.end).getTime(),
        quantity: this.filters.quantity,
        name: this.filters.name,
      };

      const response = exchange.exchanges(this.auth.jwt, filters);

      response.then(data => {
        this.table = data.data.data;
      }).catch(err => {
        console.error(err);
      });
    }
  },
  components: { Main },
};
</script>