import React, { Fragment, useEffect, useRef, useState } from "react";
import { motion, AnimatePresence } from "framer-motion";
import Loading from "./Loading";

const App = () => {
    const [loading, setLoading] = useState(true);
    useEffect(() => {
        setTimeout(() => {
            setLoading(false);
        }, 20000);
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
                                        opacity: 1,
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
                                        duration: 1,
                                        ease: "easeInOut",
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
                            className="relative w-full"
                        >
                            <div className="relative ">
                                <div
                                    role="status"
                                    class="p-4 space-y-4 max-w-md rounded border border-gray-200 divide-y divide-gray-200 shadow animate-pulse dark:divide-gray-700 md:p-6 dark:border-gray-700"
                                >
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                                            <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                                        </div>
                                        <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                                    </div>
                                    <div class="flex justify-between items-center pt-4">
                                        <div>
                                            <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                                            <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                                        </div>
                                        <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                                    </div>
                                    <div class="flex justify-between items-center pt-4">
                                        <div>
                                            <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                                            <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                                        </div>
                                        <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                                    </div>
                                    <div class="flex justify-between items-center pt-4">
                                        <div>
                                            <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                                            <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                                        </div>
                                        <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                                    </div>
                                    <div class="flex justify-between items-center pt-4">
                                        <div>
                                            <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                                            <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                                        </div>
                                        <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                                    </div>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </motion.section>
                    )}
                </AnimatePresence>
            </div>
        </Fragment>
    );
};

export default App;
