import React from "react";
import "./Styles.css";
import OneTask from "./oneTask";

class Tasks extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      tasks: [],
      taskComponents: [],
      plan_id: props.plan_id
    };
    this.search();
  }

  search = () => {
    var tasks;
    var search =
      "http://localhost/TravelManager/Scripts/PHP_REST_API/api/Tasks/read.php";
    fetch(search, {
      method: "POST",
      credentials: "same-origin",
      headers: {
        "Content-Type": "application/json"
        // "Content-Type": "application/x-www-form-urlencoded",
      },
      body: JSON.stringify({
        plan_id: this.state.plan_id
      })
    })
      .then(response => {
        return response.json();
      })
      .then(data => {
        tasks = data;
      })
      .then(() => {
        if (typeof tasks != "undefined") {
          this.update(tasks);
        }
      })
      .catch(err => {
        alert(err);
      });
  };

  update = info => {
    this.setState({ tasks: info.tasks });
  };
  render() {
    var taskslist = [];

    for (var i = 0; i < this.state.tasks.length; i++) {
      taskslist.push(
        <OneTask
          task_id={this.state.tasks[i].task_id}
          task_name={this.state.tasks[i].task_name}
        />
      );
    }
    return (
      <ul class="list-group shadow">
        <li class="list-group-item bg-dark text-white">Tasks</li>
        {taskslist}
        <li class="list-group-item bg-dark text-white d-">
          <div class="input-group">
            <input
              type="text"
              class="form-control"
              placeholder="Task Information"
            />
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="button">
                Add Task
              </button>
            </div>
          </div>
        </li>
      </ul>
    );
  }
}

export default Tasks;
