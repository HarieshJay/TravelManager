import React from "react";
import ReactDOM from "react-dom";
import Nav from "./sidenav";
import { createBrowserHistory } from "history";
import { HashRouter as Router, Route, Link } from "react-router-dom";

export const history = createBrowserHistory({
  basename: process.env.PUBLIC_URL
});

class App extends React.Component {
  render() {
    return (
      <div>
        <Nav />
      </div>
    );
  }
}

ReactDOM.render(<App />, document.querySelector("#root"));
