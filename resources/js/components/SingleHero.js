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
                        <div className='card'>
                            <div className='card-header'>{person.name}</div>
                            <div className='card-body'>
                                
                                {/*<Link className='btn btn-primary btn-sm mb-3' to='/create'>*/}
                                {/*Create new person*/}
                                {/*</Link>*/}
                                sex: {person.sex}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default SingleHero