class Chart extends React.PureComponent {
    constructor() {
        super();

        this.c3Instance = c3;
        this.chart = null;
    }

    ref = (el) => (this.chartContainer = el);

    componentDidMount() {
        this.setChart();
    }
    componentDidUpdate(prevProps) {
        const { columns, type, config } = this.props.data;
        console.log(columns);
        this.chart.load({ columns, type, ...config });
    }

    setChart() {
        const { data, onClick, onMouseOver, onMouseOut, type, config } =
            this.props;

        data["onclick"] = onClick;
        data["onmouseover"] = onMouseOver;
        data["onmouseout"] = onMouseOut;

        this.chart = this.c3Instance.generate({
            bindto: this.chartContainer,
            data: { ...data, type: type || "pie" },
            ...config,
        });
    }

    render() {
        return <div ref={this.ref}></div>;
    }
}

const donut = {
    data: {
        columns: [
            ["data", 30],
            ["data 1", 80],
        ],
    },
    config: {
        donut: {
            title: "Label",
        },
    },
};
const gauge = {
    data: { columns: [["data", 30]] },
    config: {
        color: {
            pattern: ["#FF0000"],
        },
    },
};

const gaugeMultiData = {
    data: {
        columns: [
            ["data", 10],
            ["data1", 50],
            ["data2", 80],
            ["data3", 100],
        ],
    },
    config: {
        color: {
            pattern: ["#FF0000", "#8e61e4", "#3888c1", "#48c38a"],
            threshold: {
                values: [30, 60, 90, 100],
            },
        },
    },
};
const bar = {
    data: {
        columns: [
            ["data", 10, 20, 30, 40],
            ["data 2", 40, 30, 20, 10],
        ],
    },
};
const barCombine = {
    data: {
        columns: [
            ["data1", 30, 20, 50, 40, 60, 50],
            ["data2", 200, 130, 90, 240, 130, 220],
            ["data3", 300, 200, 160, 400, 250, 250],
            ["data4", 200, 130, 90, 240, 130, 220],
            ["data5", 130, 120, 150, 140, 160, 150],
            ["data6", 90, 70, 20, 50, 60, 120],
        ],
        types: {
            data3: "spline",
            data4: "line",
            data6: "area",
        },
        groups: [["data1", "data2"]],
    },
};

const Div = ({ width, children }) => (
    <div style={{ width: `${width}px`, display: "inline-block" }}>
        {children}
    </div>
);

class MainApp extends React.Component {
    constructor() {
        super();

        this.realtimeChart();
    }
    state = {
        changePie: {
            columns: [
                ["setosa", 50],
                ["versicolor", 200],
                ["virginica", 300],
            ],
        },
        realtime: { columns: [] },
    };

    clickChart = (dataSet, index) => console.log("onclick", dataSet, index);
    mouseOverchart = (dataSet, index) =>
        console.log("onmouseover", dataSet, index);
    mouseOutchart = (dataSet, index) =>
        console.log("onmouseout", dataSet, index);

    onChangeChart = () => {
        this.setState({
            changePie: {
                columns: [
                    ["test", 40],
                    ["setosa", 100],
                    ["versicolor", 50],
                    ["virginica", 460],
                ],
            },
        });
    };

    realtimeChart = () => {
        setInterval(() => {
            let data = [];

            for (let i = 0; i <= 6; i++) {
                data[i] = [`data ${i}`];
                for (let n = 1; n <= 4; n++) {
                    const number = Math.floor(Math.random() * 150) + 1;
                    data[i][n] = number;
                }
            }

            this.setState({
                realtime: {
                    columns: data,
                },
            });
        }, 1500);
    };

    render() {
        return (
            <div>
                <Div width={300}>
                    <button onClick={this.onChangeChart}>Change</button>
                    <Chart
                        data={this.state.changePie}
                        onClick={this.clickChart}
                        onMouseOver={this.mouseOverchart}
                        onMouseOut={this.mouseOutchart}
                    />
                </Div>
                <Div width={300}>
                    <Chart
                        type="donut"
                        data={donut.data}
                        config={donut.config}
                    />
                </Div>
                <Div width={300}>
                    <Chart
                        type="gauge"
                        data={gauge.data}
                        config={gauge.config}
                    />
                </Div>
                <Div width={300}>
                    <Chart
                        type="gauge"
                        data={gaugeMultiData.data}
                        config={gaugeMultiData.config}
                    />
                </Div>
                <Div width={400}>
                    <Chart type="bar" data={bar.data} />
                </Div>
                <Div width={400}>
                    <Chart type="bar" data={barCombine.data} />
                </Div>
                <Div width={500}>
                    <Chart type="spline" data={this.state.realtime} />
                </Div>
            </div>
        );
    }
}
