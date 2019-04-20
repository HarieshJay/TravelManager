import React from "react";
import "./Styles.css";

class OneTask extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      task_id: props.task_id,
      task_name: props.task_name
    };
  }

  render() {
    return (
      <li class="list-group-item">
        <span className="d-flex justify-content-between">
          {this.state.task_name}
          <a class="btn btn-danger btn-sm text-right" href="#" role="button">
            Task Finished
          </a>
        </span>
      </li>
    );
  }
}

export default OneTask;
