import React, { Fragment } from "react";
import ReactDOM from "react-dom/client";
import Chart from "./components/Chart";

if (document.getElementById("chart") != null) {
    const root = ReactDOM.createRoot(document.getElementById("chart"));
    root.render(<Chart />);
}
