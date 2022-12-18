import React, { Fragment, useEffect, useRef, useState } from "react";
import { motion, AnimatePresence } from "framer-motion";
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
} from "chart.js";
import { Line } from "react-chartjs-2";
import faker from "faker";
import Loading from "./Loading";
import Helper from "../lib/helper";

ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
);

const Chart = () => {
    const { request, csrf } = Helper();
    const [loading, setLoading] = useState(true);
    const [orders, setOrders] = useState([]);
    const [data, setData] = useState([]);

    console.log("data", data);
    // const a = labels.map(() => faker.datatype.number({ min: 0, max: 1000 }));
    // console.log("a", a);
    // const b = Object.keys(data).map((i) => console.log("i", data[i].length));
    // const b = Object.keys(data).map((i) => data[i].length ?? 0);
    // console.log("b", b);
    console.log(
        "label",
        Object.keys(data).filter((item, key) => key)
    );

    const chart = {
        labels: Object.keys(data).filter((item, key) => key),
        datasets: [
            {
                label: "Orders",
                data: Object.keys(data).map((i) => data[i].length ?? 0),
                borderColor: "rgb(255, 99, 132)",
                backgroundColor: "rgba(255, 99, 132, 0.5)",
            },
        ],
    };

    const options = {
        responsive: true,
        plugins: {
            legend: {
                // position: 'top' as const,
            },
            title: {
                display: false,
                text: "Orders",
            },
        },
    };

    useEffect(() => {
        request
            .post("chart/orders")
            .then((response) => {
                const res = response.data;
                console.log("res", res);
                if (res.success) {
                    setOrders(res.data);
                    setData(res.data[0]);
                } else {
                    setOrders([]);
                }
            })
            .catch((err) => {
                setOrders([]);
            });
        setTimeout(() => {
            setLoading(false);
        }, 1000);
    }, []);

    return (
        <Fragment>
            <div className="p-4 w-full rounded border border-gray-200 shadow animate-pulse md:p-6 dark:border-gray-700">
                <AnimatePresence>
                    {loading ? (
                        <Fragment>
                            <Loading
                                variants={{
                                    hidden: {
                                        opacity: 0.3,
                                        // scale: 0.5
                                    },
                                    visible: {
                                        opacity: 1,
                                        // scale: 1,
                                        transition: {
                                            delayChildren: 0.02,
                                            staggerChildren: 0.05,
                                        },
                                    },
                                }}
                                transition={{
                                    type: "spring",
                                    stiffness: 260,
                                    damping: 20,
                                }}
                                initial="hidden"
                                animate="visible"
                            />
                        </Fragment>
                    ) : (
                        <motion.section
                            variants={{
                                start: {
                                    opacity: 0,
                                },
                                finished: {
                                    opacity: 1,
                                    transition: {
                                        duration: 3,
                                        ease: "easeInOut",
                                        type: "spring",
                                        stiffness: 2600,
                                        damping: 260,
                                    },
                                },
                                exit: {
                                    opacity: 0,
                                    transition: {
                                        duration: 3,
                                        ease: "easeInOut",
                                        type: "spring",
                                        stiffness: 2600,
                                        damping: 260,
                                    },
                                },
                            }}
                            initial="start"
                            animate="finished"
                            exit="exit"
                            className="relative w-full "
                        >
                            <div className="w-full flex justify-between">
                                <span className="block text-sm font-medium text-gray-700">
                                    Orders
                                </span>
                                <select
                                    onChange={(e) => {
                                        console.log(orders[e.target.value]);
                                        setData(orders[e.target.value] ?? data);
                                    }}
                                    className="mt-1 max-w-xs block w-full rounded-md border border-gray-200 dark:border-slate-800 bg-white py-2 px-3 shadow-sm focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm  dark:bg-gray-800 "
                                >
                                    {orders.map((order, index) => {
                                        return (
                                            <Fragment key={index}>
                                                <option value={index}>
                                                    {Object.keys(order)[0]} -{" "}
                                                    {
                                                        Object.keys(order)[
                                                            Object.keys(order)
                                                                .length - 1
                                                        ]
                                                    }
                                                </option>
                                            </Fragment>
                                        );
                                    })}
                                </select>
                            </div>
                            <Line options={options} data={chart} />
                        </motion.section>
                    )}
                </AnimatePresence>
            </div>
        </Fragment>
    );
};

export default Chart;
