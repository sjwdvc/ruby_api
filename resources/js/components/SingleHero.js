import axios from 'axios'
import React, {Component} from 'react'
import {Link} from 'react-router-dom'

class SingleHero extends Component {
    constructor() {
        super()
        this.state = {
            hero: {},
            person: {}
        }
    }

    componentDidMount() {
        const heroId = this.props.match.params.id
        axios.get(`/api/v1/heroeswithperson/${heroId}`).then(response => {
            this.setState({
                hero: response.data.data,
                person: response.data.data.person
            })
        })
    }

    render() {
        const {heroes, person} = this.state
        return (
            <div className='container py-4'>
                <div className='row justify-content-center'>
                    <div className='col-md-8'>
                        <div className="block">
                            <ul className="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs">
                                <li className="active">
                                    <a href="#btabs-alt-static-justified-home"><i className="fa fa-home"></i> Home</a>
                                </li>
                                <li className="">
                                    <a href="#btabs-alt-static-justified-profile"><i
                                        className="fa fa-pencil"></i> Profile</a>
                                </li>
                                <li className="">
                                    <a href="#btabs-alt-static-justified-settings"><i
                                        className="fa fa-cog"></i> Settings</a>
                                </li>
                            </ul>
                            <div className="block-content tab-content">
                                <div className="tab-pane active" id="btabs-alt-static-justified-home">
                                    <h4 className="font-w300 push-15">Home Tab</h4>
                                    <p>...</p>
                                </div>
                                <div className="tab-pane" id="btabs-alt-static-justified-profile">
                                    <h4 className="font-w300 push-15">Profile Tab</h4>
                                    <p>...</p>
                                </div>
                                <div className="tab-pane" id="btabs-alt-static-justified-settings">
                                    <h4 className="font-w300 push-15">Settings Tab</h4>
                                    <p>...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default SingleHero