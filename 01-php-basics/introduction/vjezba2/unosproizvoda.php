<?php include "header.php"; ?>

        <main>
            <h2>Unos novog proizvoda</h2>

           <form action="" method="POST">
            <label>Naziv proizvoda:</label>
            <input type="text" name="naziv">

            <label>Kategorija:</label>
            <select>
                <option>Elektronika</option>
                <option>Odjeća</option>
                <option>Knjige</option>
            </select>

            <label>Količina:</label>
            <input type="number">

            <label>Cijena:</label>
            <input type="number" step="0.01">

            <button type="submit">Spremi</button>

           </form>
        </main>

<?php include "footer.php"; ?>