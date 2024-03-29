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
import {
    eachDayOfInterval,
    eachMonthOfInterval,
    endOfMonth,
    format,
    getMonth,
    parse,
    parseISO,
    startOfMonth,
} from "date-fns";
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
    const [chart, setChart] = useState({});
    const [days, setDays] = useState([]);
    const [months, setMonths] = useState([]);
    const [start, setStart] = useState(false);
    const [chartLabel, setChartLabel] = useState(
        `${format(months[months.length - 1] ?? new Date(), "MMMM yyyy")}`
    );
    const [currentMonth, setCurrentMonth] = useState(
        `${format(months[months.length - 1] ?? new Date(), "MM-yyyy")}`
    );

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

    // const result = eachDayOfInterval({
    //     start: startOfMonth(
    //         new Date(Object.keys(data)[0])
    //             ? new Date(Object.keys(data)[0])
    //             : new Date()
    //     ),
    //     end: endOfMonth(
    //         new Date(Object.keys(data)[0])
    //             ? new Date(Object.keys(data)[0])
    //             : new Date()
    //     ),
    // });
    // const result = startOfMonth(new Date(Object.keys(data)[0]));
    // const result = startOfMonth(new Date(Object.keys(data)[0]) ?? new Date());

    // console.log("result", result);

    useEffect(() => {
        if (orders.length == 0) {
            request
                .post("chart/orders")
                .then((response) => {
                    const res = response.data;
                    // console.log("res", res);
                    if (res.start) {
                        setMonths(
                            eachMonthOfInterval({
                                start: new Date(
                                    new Date(res.start) ?? new Date()
                                ),
                                end: new Date(),
                            })
                        );
                        setStart(new Date(res.start) ?? new Date());
                    }

                    if (res.success) {
                        setData(res.data);
                        setOrders(res.data[currentMonth] ?? []);
                    } else {
                        setOrders([]);
                    }
                })
                .catch((err) => {
                    setOrders([]);
                });

            setTimeout(() => {
                setLoading(false);
            }, 2000);
        }

        if (data[currentMonth]) {
            let day = parse(`1-${currentMonth}`, "dd-MM-yyyy", new Date());
            // console.log("day", day);
            const startDayOfMonth = startOfMonth(new Date(day));
            // console.log("startDayOfMonth", startDayOfMonth);
            const endDayOfMonth = endOfMonth(new Date(day));
            // console.log("endDayOfMonth", endDayOfMonth);
            const days = eachDayOfInterval({
                start: startDayOfMonth,
                end: endDayOfMonth,
            });
            setDays(days);
            // console.log("days", days);

            const formateDays = days.map((day) => {
                return {
                    count: 0,
                    date: format(day, "d-MM-yyyy"),
                };
            });
            // console.log("formateDays", formateDays);
            let line = [];
            Object.values(data[currentMonth] ?? []).map((item) => {
                line[item.date] = item.count;
                return item;
            });

            // console.log("line", line);
            const chartData = formateDays.map((day) =>
                line[day.date] ? line[day.date] : 0
            );
            // console.log("chartData", chartData);

            setChart({
                labels: formateDays.map((item) => item.date ?? 0),
                datasets: [
                    {
                        label:
                            chartLabel ??
                            `${format(new Date(day), "MMMM yyyy")}`,
                        data: chartData,
                        borderColor: "#a5b4fc",
                        backgroundColor: "#4f46e5",
                    },
                ],
            });
        } else {
            const days = eachDayOfInterval({
                start: startOfMonth(new Date()),
                end: endOfMonth(new Date()),
            });
            setDays(days);

            const formateDays = days.map((day) => {
                return {
                    count: 0,
                    date: format(day, "d-MM-yyyy"),
                };
            });

            // console.log("line", line);
            const chartData = formateDays.map((day) => 0);
            // console.log("chartData", chartData);

            setChart({
                labels: formateDays.map((item) => item.date ?? 0),
                datasets: [
                    {
                        label:
                            chartLabel ??
                            `${format(new Date(day), "MMMM yyyy")}`,
                        data: chartData,
                        borderColor: "#a5b4fc",
                        backgroundColor: "#4f46e5",
                    },
                ],
            });
        }
    }, [data, currentMonth]);

    return (
        <Fragment>
            <div className="p-4 w-full rounded border border-slate-100 md:p-6 dark:border-gray-700">
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
                            <div className="w-full mb-3 flex sm:items-center items-start justify-between flex-col md:flex-row">
                                <span className="flex items-center text-sm bg-gray-100 dark:bg-slate-800 px-3 py-1.5 rounded-full font-medium text-gray-700 dark:text-white">
                                    Orders
                                </span>
                                <select
                                    onChange={(e) => {
                                        let day = new Date(e.target.value);
                                        setChartLabel(format(day, "MMMM yyyy"));
                                        setCurrentMonth(
                                            `${format(
                                                new Date(day),
                                                "MM-yyyy"
                                            )}`
                                        );

                                        // console.log("chartLabel", chartLabel);
                                        // console.log("change", orders);
                                        // setData(orders[e.target.value] ?? data);
                                    }}
                                    defaultValue={parse(
                                        `1-${currentMonth}`,
                                        "dd-MM-yyyy",
                                        new Date()
                                    )}
                                    className=" md:mt-0 mt-2  max-w-xs block w-full rounded-md border border-gray-200 dark:border-slate-800 bg-white py-2 px-3 shadow-sm focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm  dark:bg-gray-800 "
                                >
                                    {/* {orders.map((order, index) => {
                                        return (
                                            <Fragment key={index}>
                                                <option value={index}>
                                                    {Object.keys(order)[0]}
                                                    -
                                                    {
                                                        Object.keys(order)[
                                                            Object.keys(order)
                                                                .length - 1
                                                        ]
                                                    }
                                                </option>
                                            </Fragment>
                                        );
                                    })} */}
                                    {months.map((month, index) => {
                                        return (
                                            <Fragment
                                                key={format(month, "MM-yyyy")}
                                            >
                                                <option
                                                    // value={format(
                                                    //     month,
                                                    //     "d-MM-yyyy"
                                                    // )}
                                                    value={month}
                                                >
                                                    {format(month, "MMMM yyyy")}
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
