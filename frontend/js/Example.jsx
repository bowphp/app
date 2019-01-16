import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
  render() {
    return (
      <div>
        I'm am example <b><a href="https://reactjs.org">React</a></b> Component.
      </div>
    );
  }
}

if (document.getElementById('main')) {
  ReactDOM.render(<Example />, document.getElementById('main'));
}