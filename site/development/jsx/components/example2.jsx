/*
@category   WebApplicationKit
@package    Web Application Starter Kit
@author     Shannon Reca
@copyright  2017 Shannon Reca
@since      04/18/17
*/

import React from 'react';

// Get Global Functions
import GlobalFunctions from './../mixins/global';

const Example2 = React.createClass({
	mixins: [GlobalFunctions],

	// constructor() is not necessary.
	componentWillMount: function() {
		// We're setting the default state in this component.
		this.state = {
			value: 'Type here!'
		};
	},

	handleChange: function(e) {
		// Updating state.
		this.setState({
			value: e.target.value
		});
	},

	// The component will re-render when the state has changed.
	render: function() {

		return (
			<div className="react">
				{this.props.message} - {this.state.value}
				<div>
					<textarea onChange={this.handleChange} defaultValue={this.state.value}/>
				</div>
				<button onClick={() => this.showAlert("You pressed alert!")}>Alert</button>
			</div>
		)
	}
});

export default Example2;