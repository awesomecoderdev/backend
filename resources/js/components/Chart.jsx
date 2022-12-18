import React, { Fragment, useEffect, useRef, useState } from "react";
import { motion, AnimatePresence } from "framer-motion";
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend,
} from "chart.js";
import Loading from "./Loading";
import Helper from "../lib/helper";

ChartJS.register(
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend
);

const labels = ["January", "February", "March", "April", "May", "June", "July"];

const Chart = () => {
    const { request, csrf } = Helper();
    const [loading, setLoading] = useState(true);
    const [orders, setOrders] = useState([]);
    const [data, setData] = useState([]);
    const [paged, setPaged] = useState(0);

    useEffect(() => {
        request
            .post("chart/orders")
            .then((response) => {
                const res = response.data;
                console.log("res", res);
                if (res.success) {
                    setOrders(res);
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
            <div className="relative">
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
                            className="relative w-full grid space-y-3"
                        >
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Quia dolor quasi at magnam,
                                optio, laboriosam culpa et qui eaque nobis harum
                                dolorem quis. Ut voluptatum architecto
                                assumenda, minima dolorum eligendi.
                            </p>
                        </motion.section>
                    )}
                </AnimatePresence>
            </div>
        </Fragment>
    );
};

export default Chart;
