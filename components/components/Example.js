import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
	render() {
		return (
			<div>
				I'm an example component.
			</div>
		);
	}
}

if (document.getElementById('root')) {
	ReactDOM.render(<Example />, document.getElementById('root'));
}