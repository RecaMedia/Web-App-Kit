/*
@category   WebApplicationKit
@package    Web Application Starter Kit
@author     Shannon Reca
@copyright  2017 Shannon Reca
@since      04/18/17
*/

// ES5 vs ES6
// https://daveceddia.com/react-es5-createclass-vs-es6-classes/

import React from 'react';

class Example extends React.Component {

	// constructor() is not necessary.
	constructor(props) {
		// "super()" is necessary if you're using a "constructor()" but passing in "props" is not.
		// "this" cannot be allowed before super() because "this" is uninitialized if super() is not called.
		super(props);

		// Functions are not autobound in ES6
		// This binding is necessary to make `this` work in the callback
		this.handleChange = this.handleChange.bind(this);

		// We're setting the default state in this component.
		this.state = {
			value: 'Type here!'
		};
	}

	handleChange(e) {
		// Updating state.
		this.setState({
			value: e.target.value
		});
	}

	// the ES7 way
	// all done, no binding required
	// Needed: Babel “stage-0” preset
	/*
	handleChange = (event) => {
		this.setState({
			text: event.target.value
		});
	}
	*/

	// The component will re-render when the state has changed.
	render() {

		return (
			<div className="react">
				{this.props.message} - {this.state.value}
				<div>
					<textarea onChange={this.handleChange} defaultValue={this.state.value}/>
				</div>
			</div>
		)
		// Not as efficient, since it's within render and is called everything component is re-rendered.
		// {this.handleChange.bind(this)}
		// {() => this.handleChange()}
	}
}

export default Example;