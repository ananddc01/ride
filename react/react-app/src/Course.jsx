import PropTypes from 'prop-types'

function Course(props) {

    function BuyCourse(discount){
      console.log(props.name,"purchased with",discount,"% discount");
    }

    return (
    props.name && <div className="card">
        <img src={props.image} alt="" />
        <h3>{props.name}</h3>
        <p>{props.price}</p>
        <button onClick={()=> BuyCourse(20 )}>Buy Now</button>
    </div>
  );

  
}

Course.PropTypes={
  name : PropTypes.string,
  rating:PropTypes.number,
  show:PropTypes.bool
}



export default Course



