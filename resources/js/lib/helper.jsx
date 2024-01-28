import axios from "axios";

import React from "react";

const Helper = () => {
    // request
    const request = axios.create({
        baseURL: "https://api.wpplagiarism.co.bd/v1/",
        withCredentials: true,
        headers: {
            "X-Requested-With": "XMLHttpRequest",
            "Content-type": "application/json",
        },
    });

    // csrf
    const csrf = () => request.get("/csrf");

    return {
        csrf,
        request,
    };
};

export default Helper;
