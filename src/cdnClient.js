import axios from "axios";

export const CDNClient = axios.create({
  baseURL: "https://smart.condivision.cloud/api/v2.0/public",
  withCredentials: false,
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json"
  }
});