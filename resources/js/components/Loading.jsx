import React from "react";
import { motion } from "framer-motion";
const icon = {
    hidden: {
        opacity: 0,
        pathLength: 0,
        fill: "rgba(255, 255, 255, 0)",
    },
    visible: {
        opacity: 1,
        pathLength: 1,
        fill: "rgba(255, 255, 255, 1)",
    },
};

const svgVariants = {
    start: {
        // opacity:0,
        // pathLength: 0,
        stroke: "#10b981",
    },
    finished: {
        // opacity:1,
        // pathLength: 1,
        stroke: "#064e3b",
        transition: {
            duration: 1.8,
            ease: "easeInOut",
        },
    },
};

const pathVariants = {
    start: {
        opacity: 0,
        pathLength: 0,
    },
    finished: {
        opacity: [0.7, 1],
        pathLength: [0, 1],
        pathLength: 1,
        transition: {
            // delay: 0.5,
            duration: 3,
            ease: "easeInOut",
            stiffness: 260,
            repeat: Infinity,
            repeatDelay: 3,
        },
    },
};
const dropDownMotion = {
    hidden: {
        y: -5,
        opacity: 0,
        scale: 0.8,
    },
    visible: {
        y: 0,
        scale: 1,
        opacity: [0.1, 0.3, 0.5, 0.7, 1],
        transition: {
            stiffness: 260,
            repeat: Infinity,
            repeatDelay: 3,
        },
    },
};

const Loading = ({ ...props }) => {
    return (
        <motion.div
            {...props}
            className="p-4 w-full rounded border border-gray-200 shadow animate-pulse md:p-6 dark:border-gray-700"
        >
            {/* <motion.svg
                variants={svgVariants}
                initial="start"
                animate="finished"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                strokeWidth={0.5}
                className="w-10 h-10 stroke-primary-500"
            >
                <motion.path
                    variants={pathVariants}
                    initial="start"
                    animate="finished"
                    d="M21.928 11.607c-.202-.488-.635-.605-.928-.633V8c0-1.103-.897-2-2-2h-6V4.61c.305-.274.5-.668.5-1.11a1.5 1.5 0 0 0-3 0c0 .442.195.836.5 1.11V6H5c-1.103 0-2 .897-2 2v2.997l-.082.006A1 1 0 0 0 1.99 12v2a1 1 0 0 0 1 1H3v5c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-5a1 1 0 0 0 1-1v-1.938a1.006 1.006 0 0 0-.072-.455zM5 20V8h14l.001 3.996L19 12v2l.001.005.001 5.995H5z"
                ></motion.path>
                <ellipse cx="8.5" cy="12" rx="1.5" ry="2"></ellipse>
                <ellipse cx="15.5" cy="12" rx="1.5" ry="2"></ellipse>
                <path d="M8 16h8v2H8z"></path>
            </motion.svg> */}

            <motion.div
                variants={{
                    hidden: {
                        x: -5,
                        opacity: 0,
                        scale: 0.8,
                    },
                    visible: {
                        x: 0,
                        scale: 1,
                        opacity: [0.1, 0.3, 0.5, 0.7, 1],
                        transition: {
                            stiffness: 260,
                            // repeat: Infinity,
                            // repeatDelay: 3,
                        },
                    },
                }}
                className="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2.5"
            ></motion.div>
            <motion.div
                variants={{
                    hidden: {
                        x: -5,
                        opacity: 0,
                        scale: 0.8,
                    },
                    visible: {
                        x: 0,
                        scale: 1,
                        opacity: [0.1, 0.3, 0.5, 0.7, 1],
                        transition: {
                            stiffness: 260,
                            // repeat: Infinity,
                            // repeatDelay: 3,
                        },
                    },
                }}
                className="mb-10 w-48 h-2 bg-gray-200 rounded-full dark:bg-gray-700"
            ></motion.div>
            <div className="flex items-baseline mt-4 space-x-6">
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-56 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-64 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-56 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-64 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-64 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-56 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-64 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-56 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-64 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-56 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-64 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
                <motion.div
                    variants={dropDownMotion}
                    className="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"
                ></motion.div>
            </div>
        </motion.div>
    );
};

export default Loading;
