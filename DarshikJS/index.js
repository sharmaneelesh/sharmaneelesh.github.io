//Creating the visual representation

myForm.addEventListener("submit", function (e) {
    e.preventDefault();
    const input = csvFile.files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
        const text = e.target.result;
        const data = csvToArray(text);
        {
            console.log(data[0].title);
            document.write('<div id="graph"></div>')

            //Sets the conditions for nodes and edges

            {
                const container = document.getElementById("graph");

                let nodes = [
                    { id: 1, label: 'Movie' },
                    { id: 2, label: 'Before 2005' },
                    { id: 3, label: 'After 2005' },
                    { id: 4, label: 'Budget > 14000000' },
                    { id: 5, label: 'Budget < 14000000' },
                    { id: 6, label: 'Profitable' },
                    { id: 7, label: 'Non-Profitable' },
                    { id: 8, label: 'Voter Rating > 7' },
                ];

                let edges = [
                    { id: 1, start: 1, end: 2, label: "" },
                    { id: 2, start: 1, end: 3, label: "" },
                    { id: 3, start: 3, end: 4, label: "" },
                    { id: 4, start: 3, end: 5, label: "" },
                    { id: 5, start: 4, end: 6, label: "" },
                    { id: 6, start: 4, end: 7, label: "" },
                    { id: 7, start: 6, end: 8, label: "" },
                ];

                let nodeCounter = 9
                let edgeCounter = 8

                {
                    let entries = 0
                    for (i = 1; i < data.length; i++) {
                        if (entries < 10 && (data[i].vote_average > 7) && (data[i].revenue > data[i].budget) && (data[i].budget > 14000000) && data[i].release_date > 2005) {
                            nodes.push({ id: nodeCounter, label: data[i].title })
                            edges.push({ id: edgeCounter, start: 8, end: nodeCounter, label: "" })
                            nodeCounter++
                            edgeCounter++
                            entries++
                        }
                    }

                    entries = 0
                    for (i = 1; i < data.length; i++) {
                        if (entries < 7 && (data[i].revenue < data[i].budget) && (data[i].budget > 14000000) && data[i].release_date > 2005) {
                            nodes.push({ id: nodeCounter, label: data[i].title })
                            edges.push({ id: edgeCounter, start: 7, end: nodeCounter, label: "" })
                            nodeCounter++
                            edgeCounter++
                            entries++
                        }
                    }

                    entries = 0
                    for (i = 1; i < data.length; i++) {
                        if (entries < 4 && (data[i].budget < 14000000) && data[i].release_date > 2005) {
                            nodes.push({ id: nodeCounter, label: data[i].title })
                            edges.push({ id: edgeCounter, start: 2, end: nodeCounter, label: "" })
                            nodeCounter++
                            edgeCounter++
                            entries++
                        }
                    }

                    entries = 0
                    for (i = 1; i < data.length; i++) {
                        if (entries < 5 && data[i].release_date < 2005) {
                            nodes.push({ id: nodeCounter, label: data[i].title })
                            edges.push({ id: edgeCounter, start: 5, end: nodeCounter, label: "" })
                            nodeCounter++
                            edgeCounter++
                            entries++
                        }
                    }
                }


                // First `Orb` is just a namespace of the JS package 



                const orb = new Orb.Orb(container);

                // Initialize nodes and edges
                orb.data.setup({ nodes, edges });

                // Render and recenter the view
                orb.view.render(() => {
                    orb.view.recenter();
                });

            }

        };
    };

    reader.readAsText(input);
});
