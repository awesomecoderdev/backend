import React, { Fragment, useEffect, useRef, useState } from "react";
import {
    ArrowLeftOnRectangleIcon,
    BellAlertIcon,
    BellIcon,
    ChatBubbleBottomCenterTextIcon,
    ChevronDownIcon,
    Cog6ToothIcon,
    EllipsisVerticalIcon,
    PencilSquareIcon,
    UserCircleIcon,
} from "@heroicons/react/24/outline";
import { motion, AnimatePresence } from "framer-motion";

const App = () => {
    const dropDownMotion = {
        hidden: {
            x: -5,
            opacity: 0,
        },
        visible: {
            x: 0,
            opacity: 1,
            transition: {
                stiffness: 260,
                // repeat: Infinity,
                // repeatDelay: 3
            },
        },
    };
    return (
        <Fragment>
            {/* <AnimatePresence> */}
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
                className="main w-full  "
            >
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Dolorum impedit nostrum rem aliquid inventore voluptate labore,
                totam, harum perferendis quisquam autem. Dolores officiis ea
                corrupti laborum unde, non excepturi quos?
            </motion.section>
            {/* </AnimatePresence> */}
        </Fragment>
    );
};

export default App;
