import React, { Fragment } from "react";
import ReactDOM from "react-dom/client";
import App from "./components/App";

if (document.getElementById("dashboard") != null) {
    const root = ReactDOM.createRoot(document.getElementById("dashboard"));
    root.render(<App />);
}
